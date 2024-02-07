var gulp = require('gulp');
var fs = require('fs');
var less = require('gulp-less');
var babel = require('gulp-babel');
var concat = require('gulp-concat');
var terser = require('gulp-terser');
var rename = require('gulp-rename');
var csso = require('gulp-csso');

const path = require('path');
const { log } = require('console');
const { exit } = require('process');

dir = process.env.INIT_CWD;
let theme_dir = dir+'/';

var paths = {
    styles: {
        // primary styles
        src: theme_dir+'src/less/all.less',
        dest: theme_dir+'css/'
    },
    watchStyles: {
        src: [
            theme_dir+'src/less/**/*.less', //catchall for any folders that would live withing src/less
        ]
    },
    scripts: {
        // primary scripts
        src: [
            theme_dir+'src/scripts/libs/**/*.js', //catchall for any non composer added js libraries
            theme_dir+'src/scripts/*.js' 
        ],
        dest: theme_dir+'scripts/'
    },
    twig: {
        src: [
            theme_dir+'views/**/*.twig', //catchall for all twig files within views
        ]
    }
};

/*
 * Define our tasks using plain functions
 */
function styles() {
    return gulp.src(paths.styles.src)
        .pipe(less({
            'math': 'always',
            'paths': [theme_dir+'src/less']
        }))
        .pipe(csso())
        // pass in options to the stream
        .pipe(rename({
            basename: 'all',
            suffix: '.min'
        }))
        .pipe(gulp.dest(paths.styles.dest));
}
 
function scripts() {
    return gulp.src(paths.scripts.src)
    .pipe(concat('all.min.js'))
    .pipe(babel())
    .pipe(terser({
        'format': {
            'comments': false
        }
    }))
    .pipe(gulp.dest(paths.scripts.dest));
}
 
var watch = function(){
    build();
    gulp.watch(paths.watchStyles.src, {usePolling:true}, gulp.series(styles, buildVersionfile));
    gulp.watch(paths.scripts.src,{usePolling:true}, gulp.series(scripts, buildVersionfile));
    gulp.watch(paths.twig.src,{usePolling:true}, gulp.series(buildVersionfile));
}

/**
 * Build Version File
 */
function buildVersionfile(cb) {
    var ts = Math.floor(new Date().getTime() / 1000);
    fs.writeFileSync(theme_dir+'_version.num', ts.toString(), {}, function() {});
    cb();
}
 
/*
 * Specify if tasks run in series or parallel using `gulp.series` and `gulp.parallel`
 */
var build = gulp.series(gulp.parallel(
    styles, 
    scripts,
    buildVersionfile
));
 
/*
 * You can use CommonJS `exports` module notation to declare tasks
 */
exports.styles = styles;
exports.scripts = scripts;
exports.watch = watch;
exports.build = build;
/*
 * Define default task that can be called by just running `gulp` from cli
 */
exports.default = exports.build;

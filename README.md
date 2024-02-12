# KJ Timber Theme
**Note - The wp-contents folder contains all my work for the project exactly as it is in my local environment. The env and docker-compose.yml file are for setting up the local dev container. I included a zip file that contains the wp-content folder and a database I used with a bunch of test entries in case thats helpful.**

## Docker Set Up
1. Have latest version of docker installed
2. Create project directory
3. Import docker-compose.yaml file to newly created directory
    1. (Note - the ports can be swapped out if they are in use already)
4. Create .env file in same directory as the docker yaml file
    1. In this folder declare your MYSQL variables that will be referenced in the yaml file
    2. (Note -The purpose of this is in case there is a need to make the docker yaml file public, the env variables can be kept outside the yaml file for security purposes)
5. In terminal open directory that has docker-compose.yaml file and .env file and run “docker compose up”.
    1. This will install MySQL, PHPmyadmin, and WP
    2. Navigate to the localhost port running WP and finish WP set up.
    
    Additional notes - 
    
    - yaml file is set to only show wp-content folder for easier management and git maintainability
    - debug can be enabled/disabled by modifying the "WORDPRESS_DEBUG" variable in the docker yaml file
    - I created this custom yaml file because the docker container provided by WP does not include a phpmyadmin image which is handy for DB management

## WordPress theme
For this project I used timber/twig and the timber theme that is based off _s. Timber is installed inside the theme using the “composer require timber/timber” command in the terminal. This theme is a block based website so the home page is constructed out of 3 blocks. The products page is a non block page but could be easily converted if need be. 

### Theme composer primary dependencies
- Timber
- https://palmiak.github.io/timber-acf-wp-blocks/

### Theme NPM dependencies (these need to be installed before running gulp commands)
- Gulp
- Gulp FS
- Gulp LESS
- Gulp Babel
- Gulp Terser
- Gulp Rename
- Gulp CSSO

### Menus
Menus are declared in WP

### Mobile
Website is mobile/tablet friendly

### Home page
Home page is built with 3 blocks: Home Hero, Related Products, and Testimonials blocks

### Products page 
This is a CPT single page and pulls data from the ACF fields on the page

## Project Thoughts
Overall im very pleased with this project. I think this custom theme uses best practices and techonologies and im going to continue working on it so I can build myself a new personal website. Apart from the related field block giving me a bit of a problem with pulling in data from the product post meta, this was pretty smooth. Im sure as soon as I send this off im going to think of a bunch of other improvements I can make but this is a list I made for myself of continuing improvements. 

### Things I would have done if I was going to spend more time on this:
- Instead of declaring fields in the CRM I would have generated them in the theme. For this test case I thought the locally stored ACF JSON is fine.
- Create 'gallery' block
- Enqueue the gallery splide JS library using wp_enqueue_scripts
- Pull in version number from _version.num and add it to the script and styles enqueues
- Have dedicated styles for admin interface
- Mess around with search, 404, archive templates
- Unregister a bunch of native gutenberg blocks
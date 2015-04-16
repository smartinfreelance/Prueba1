module.exports = function(grunt) {
  "use strict";

  // Load plugins required to run tasks
  require('load-grunt-tasks')(grunt);


  // Project configuration
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    // grunt-dev-update
    // Update packages/nodes
    devUpdate: {
      main: {
        options: {
          updateType: 'prompt', // Prompt user to confirm update of every package
          reportUpdated: false, // Don't report already updated packages
          semver: false, // Use package.json semver rules when updating
          packages: { // What packages to check
            devDependencies: true, // Outdated devDependencies are installed using the --save-dev option
            dependencies: false // Outdated dependencies are installed using the --save option
          },
          packageJson: null // Find package.json automatically
        }
      }
    },

    // grunt-contrib-clean
    // Cleanup temporary files
    clean: {
      sass: {
        src: ['.sass-cache/*']
      }
    },

    // grunt-contrib-compass
    // Compile Sass into CSS using Compass and move to build folder
    compass: { 
      dev: { 
        options: { 
          sourcemap: true,
          sassDir: 'src/scss',
          cssDir: 'dev/non-html/agency/css',
          outputStyle: 'expanded'
        }
      }
    },

    // grunt-contrib-copy
    // copy the content files and support files
    copy: {
      build: {
        files: [
          // makes all src relative to cwd
          {expand: true, cwd: 'src/cxloyalty/html',         src: ['**'],              dest: 'dev/html/'},
          {expand: true, cwd: 'src/pages/common',           src: ['**'],              dest: 'dev/html/agency/common/pages'},
          {expand: true, cwd: 'src/pages/dynamic',          src: ['**'],              dest: 'dev/html/agency/dynamic'},
          {expand: true, cwd: 'src/snippets',               src: ['**'],              dest: 'dev/html/agency/common/includes'},
          {expand: true, cwd: 'src/liveswap',               src: ['*.js'],            dest: 'dev/html/agency/common/liveswap'},
          {expand: true, cwd: 'src/cxloyalty/non-html',     src: ['**'],              dest: 'dev/non-html'},
          {expand: true, cwd: 'src/images/',                src: ['**/*.{gif,png,jpg,gif}'], dest: 'dev/non-html/agency/i'},
          {expand: true, cwd: 'src/scss',                   src: ['*.htc'],           dest: 'dev/non-html/agency/css'},
          {expand: true, cwd: 'src/fonts',                  src: ['**'],              dest: 'dev/non-html/agency/fonts'},
          {expand: true, cwd: 'src/pdfs',                   src: ['**'],              dest: 'dev/non-html/agency/pdfs'}
        ]
      }
    },

    // grunt-contrib-sass
    sass: {                              // Task
      dist: {                            // Target
        options: {                       // Target options
          style: 'expanded'
        },
        files: [{
          expand: false,
          cwd: 'src/scss/',
          src: ['*.scss'],
          dest: 'dev/non-html/css'
        }]
      }
    },

    // grunt-contrib-csslint
    // Detect CSS errors (lint)
    csslint: {
  	  strict: {
  	    options: {
  	      import: 2
  	    },
  	    src: 'dev/non-html/css/main.css'
  	  },
  	  lax: {
  	    options: {
  	      import: false
  	    },
  	    src: 'dev/non-html/css/main.css'
  	  }
  	},

    // grunt-contrib-imagemin
    // Optimize images (GIF, JPEG, PNG, SVG) and move to build folder
    imagemin: { 
      dynamic: { 
        files: [{
          expand: true, 
          cwd: 'src/images/',
          src: ['**/*.{gif,png,jpg,gif}'],
          dest: 'dev/non-html/agency/i/'
        }]
      }
    },

    // grunt-contrib-jshint
    // Detect JavaScript errors (lint)
    jshint: {
      options: {
        curly: true,
        eqeqeq: true,
        eqnull: true,
        browser: true,
        globals: {
          jQuery: true
        }
      },
      beforeconcat: ['src/js/main.js','src/js/functions.js']
      /* , afterconcat: 'dev/non-html/agency/js/main.js' */
    },

    // grunt-contrib-concat
    // Concatenate JS and move to build folder
    concat: {
      options: {
      	separator: ';'
      },
      head: {
    	  src: [
          'src/js/modernizr.custom.js',
          'src/js/jquery-2.1.1.js'
        ],
        dest: 'dev/non-html/agency/js/head.js' //main_concat
      },
      head_ie: {
    	  src: [
          'src/js/modernizr.custom.js',
          'src/js/jquery-1.11.1.js',
//          'src/js/css3-mediaqueries.js',
          'src/js/selectivizr.js',
          'src/js/nwmatcher.js',
          'src/js/rem.min.js',
          'src/js/ie-prototypes.js'
        ],
        dest: 'dev/non-html/agency/js/head-ie.js' //main_concat
      },
      dist: {
    	  src: [
          'src/js/owl.carousel.js',
          'src/js/jquery.magnific-popup.js',
          'src/js/functions.js',
          'src/js/main.js'
        ],
        dest: 'dev/non-html/agency/js/main.js' //main_concat
      },
      dist_ie: {
    	  src: [
          'src/js/css3-mediaqueries.js',
          'src/js/owl.carousel.js',
          'src/js/jquery.magnific-popup.js',
          'src/js/functions.js',
          'src/js/main.js'
        ],
        dest: 'dev/non-html/agency/js/main-ie.js' //main_concat
      },
      control_home: {
    	  src: [
          'src/js/animations_shared.js',
          'src/js/tweenlite.min.js',
          'src/js/cssplugin.min.js',
          'src/js/timelinelite.min.js', 
          'src/js/control_home.js'
        ],
        dest: 'dev/non-html/agency/js/home.js' //home page animation
      },
      control_buypowercard: {
    	  src: [
          'src/js/animations_shared.js',
          'src/js/tweenmax.min.js',
          'src/js/control_buypowercard.js'
        ],
        dest: 'dev/non-html/agency/js/about-buypowercard.js' //BuyPower Card masthead animation
      },
      control_efc: {
    	  src: [
          'src/js/animations_shared.js',
          'src/js/tweenmax.min.js',
          'src/js/control_efc.js'
        ],
        dest: 'dev/non-html/agency/js/about-efc.js' //GM Extended Family Card masthead animation
      },
      control_business: {
    	  src: [
          'src/js/animations_shared.js',
          'src/js/tweenmax.min.js',
          'src/js/control_business.js'
        ],
        dest: 'dev/non-html/agency/js/about-business.js' //GM Business Card masthead animation
      },
      videos: {
    	  src: [
          'src/js/videoplayer.js'
        ],
        dest: 'dev/non-html/agency/js/videos.js'                   //Video player
      },
      vehicles: {
    	  src: [
          'src/js/vehicles_shared.js'
        ],
        dest: 'dev/non-html/agency/js/vehicles_shared.js'          //Vehicles
      },
      redemptions: {
    	  src: [
          'src/js/jquery.formatcurrency-1.4.0.js',
          'src/js/redemptionmap.js'
        ],
        dest: 'dev/non-html/agency/js/redemptionmap.js'            //Redemption Map
      },
      earnings_calculator: {
    	  src: [
          'src/js/earnings-calculator.js'
        ],
        dest: 'dev/non-html/agency/js/earnings-calculator.js'      //Earnings Calculator
      },
      s_code: {
    	  src: [
          'src/js/s_code.js'
        ],
        dest: 'dev/non-html/agency/js/s_code.js'                 //Omniture
      },
      omniture: {
    	  src: [
          'src/js/omniture.js'
        ],
        dest: 'dev/non-html/agency/js/omniture.js'                 //Omniture
      }
    },

    // grunt-contrib-compressor
    // Minify CSS, JS, HTML
    compressor: {
      css: {
        //compress css file, like cssmin, to https://github.com/gruntjs/grunt-contrib-cssmin
        files: {
          'dev/non-html/agency/css/main.min.css': 'dev/non-html/agency/css/main.css',         //
          'dev/non-html/agency/css/vehicles.min.css': 'dev/non-html/agency/css/vehicles.css'  //
        }
      },
      js: {
        //compress js file, like uglify, to https://github.com/gruntjs/grunt-contrib-uglify
        options: {
          mangle: false
        },
        files: {
          'dev/non-html/agency/js/head.min.js': 'dev/non-html/agency/js/head.js',                               //main_concat
          'dev/non-html/agency/js/head-ie.min.js': 'dev/non-html/agency/js/head-ie.js',                         //main_concat
          'dev/non-html/agency/js/main.min.js': 'dev/non-html/agency/js/main.js',                               //main_concat
          'dev/non-html/agency/js/main-ie.min.js': 'dev/non-html/agency/js/main-ie.js',                         //main_concat
          'dev/non-html/agency/js/home.min.js': 'dev/non-html/agency/js/home.js',                               //home page animation
          'dev/non-html/agency/js/about-buypowercard.min.js': 'dev/non-html/agency/js/about-buypowercard.js',   //BuyPower Card masthead animation
          'dev/non-html/agency/js/about-efc.min.js': 'dev/non-html/agency/js/about-efc.js',                     //GM Extended Family Card masthead animation
          'dev/non-html/agency/js/about-business.min.js': 'dev/non-html/agency/js/about-business.js',           //GM Business Card masthead animation
          'dev/non-html/agency/js/videos.min.js': 'dev/non-html/agency/js/videos.js',                           //Video player
          'dev/non-html/agency/js/vehicles_shared.min.js': 'dev/non-html/agency/js/vehicles_shared.js',         //Vehicles
          'dev/non-html/agency/js/redemptionmap.min.js': 'dev/non-html/agency/js/redemptionmap.js',             //Redemption Map
          'dev/non-html/agency/js/earnings-calculator.min.js': 'dev/non-html/agency/js/earnings-calculator.js', //Earnings Calculator
          'dev/non-html/agency/js/s_code.min.js': 'dev/non-html/agency/js/s_code.js',                           //Omniture init
          'dev/non-html/agency/js/omniture.min.js': 'dev/non-html/agency/js/omniture.js'                        //Omniture
        }
      },
      html: {
        //compress html file, like htmlmin, to https://github.com/gruntjs/grunt-contrib-htmlmin
        options: {
          removeComments: true,
          collapseWhitespace: true,
          collapseBooleanAttributes: true,
          removeAttributeQuotes: true,
          removeRedundantAttributes: true,
          removeEmptyAttributes: true,
          useShortDoctype: true
        },
        files: {
          'src/': 'dev/'
        }
      }
    },

    // Future image task: https://github.com/somerandomdude/grunt-webp

    // Future image task: Produce images of different sizes
    // https://github.com/andismith/grunt-responsive-images
    // https://github.com/BBC-News/Imager.js/

    // Future optimization task
    // https://github.com/assetgraph/assetgraph

    // Future performance task
    // https://www.npmjs.org/package/grunt-pagespeed

    // Start a local web server (required to collect screenshots)
    // grunt-contrib-connect
    connect: {
      server: {
        options: {
          cwd: '.build',
          port: 9001,
          hostname: '0.0.0.0',
          livereload: 35729
        }
      }
    },

    // grunt-contrib-watch
    // Future task: Take screenshots of all pages at different resolutions (breakpoints)
    // https://www.npmjs.org/package/grunt-breakshots
    // Slimer.js for Firefox
    // Phantom.js for Chrome

    // Watch for changes to Sass, HTML, JS files (but not images or fonts)
    watch: {
      options: {
        livereload: true,
        nospawn: true
      },
      css: {
        files: 'src/scss/**/*.scss',
        tasks: ['compass'],
      },
//      html: {
//        files: 'src/*.jade',
//        tasks: ['newer:jade'],
//      },
      img: {
        files: 'img/*',
        tasks: ['newer:imagemin'],
      },
      js: {
        files: 'src/js/*.js',
        tasks: ['concat', 'compressor:js'],
      }
    }
  });


  // Define tasks to perform for each grunt command
  grunt.registerTask('css', [
    'compass', 
    'clean:sass'
  ]);

  grunt.registerTask('js', [
    'concat',
    'compressor:js'
  ]);

  grunt.registerTask('default', [
    'compass', 
    'clean:sass',
    'concat',
    'compressor:css',
    'compressor:js'
  ]);

  grunt.registerTask('build', [
    'compass',
    'clean:sass',
    // 'csslint',
    'jshint',
    'concat',
    'newer:copy',
    'compressor:css',
    'compressor:js',
    //'compressor:html',
    //'uncss',
    'newer:imagemin'
  ]);

};
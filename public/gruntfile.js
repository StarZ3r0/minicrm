var grunt = require('grunt');

grunt.loadNpmTasks('grunt-contrib-jshint');
grunt.loadNpmTasks('grunt-contrib-uglify');
grunt.loadNpmTasks('grunt-contrib-sass');
grunt.loadNpmTasks('grunt-contrib-concat');
grunt.loadNpmTasks('grunt-contrib-watch');
grunt.loadNpmTasks('grunt-contrib-imagemin');
grunt.loadNpmTasks('grunt-contrib-clean');

grunt.initConfig({
  jshint: {
    options: {
      ignores: ['assets/js/*.min.js']
    },
    files: ['assets/js/default.js']
  },
  uglify: {
    all: {
      files: {
        'assets/vendor/bootbox/bootbox.min.js': ['assets/vendor/bootbox/bootbox.js'],
        'assets/js/default.min.js': ['assets/js/default.js'],
        'assets/js/parsley-config.min.js': ['assets/js/parsley-config.js'],
        'assets/js/parsley-i18n-hu.min.js': ['assets/js/parsley-i18n-hu.js']
      }
    }
  },
  sass: {                              
    dev: {                            
      options: {                       
        style: 'expanded'
      },
      files: {                         
        'assets/css/default.css': 'assets/css/default.scss'
      }
    },
    prod: {                            
      options: {                       
        style: 'compressed'
      },
      files: {                         
        'assets/css/default.min.css': 'assets/css/default.scss'
      }
    }
  },
  concat: {
    prod: {
      src: [
        'assets/vendor/bootbox/bootbox.min.js',
        'assets/vendor/respond/dest/respond.min.js',
        'assets/vendor/html5shiv/dist/html5shiv.min.js',
        'assets/vendor/jquery/dist/jquery.min.js',
        'assets/vendor/bootstrap/dist/js/bootstrap.min.js',
        'assets/js/parsley-config.min.js',
        'assets/vendor/parsleyjs/dist/parsley.min.js',
        'assets/js/parsley-i18n-hu.min.js',
        'assets/js/default.min.js'
      ],
      dest: 'assets/js/dist/all.min.js',
    }
  },
  watch: {
    files: ['assets/css/*.scss'],
    tasks: ['sass:dev'],
    options: {
      livereload: true   
    }
  },
  imagemin: {
    dynamic: {
      files: [{
        expand: true,
        cwd: 'assets/img/',
        src: ['*.{png,jpg,gif}'],
        dest: 'assets/img/dist/'
      }]
    }
  },
  clean: ["assets/js/dist"]
});

grunt.registerTask('default', ['jshint', 'sass:dev']);
grunt.registerTask('prod', ['clean', 'uglify', 'concat', 'sass:prod', 'imagemin']);
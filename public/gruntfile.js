var grunt = require('grunt');

grunt.loadNpmTasks('grunt-contrib-jshint');
grunt.loadNpmTasks('grunt-contrib-uglify');
grunt.loadNpmTasks('grunt-contrib-sass');
grunt.loadNpmTasks('grunt-contrib-concat');
grunt.loadNpmTasks('grunt-contrib-watch');
grunt.loadNpmTasks('grunt-contrib-imagemin');
grunt.loadNpmTasks('grunt-contrib-clean');
grunt.loadNpmTasks('grunt-contrib-copy');

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
        'assets/vendor/raty/lib/jquery.raty.min.js': ['assets/vendor/raty/lib/jquery.raty.js'],
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
    dist: {                            
      options: {                       
        style: 'compressed'
      },
      files: {                         
        'assets/css/default.min.css': 'assets/css/default.scss'
      }
    }
  },
  concat: {
    js: {
      src: [
        //'assets/vendor/html5shiv/dist/html5shiv.min.js',
        //'assets/vendor/respond/dest/respond.min.js',
        'assets/vendor/jquery/dist/jquery.min.js',
        'assets/vendor/bootstrap/dist/js/bootstrap.min.js',
        // uglify
        'assets/js/parsley-config.min.js',
        'assets/vendor/parsleyjs/dist/parsley.min.js',
        // uglify
        'assets/js/parsley-i18n-hu.min.js',
        // uglify
        'assets/vendor/bootbox/bootbox.min.js',
        // uglify
        'assets/vendor/raty/lib/jquery.raty.min.js',
        // uglify
        'assets/js/default.min.js'
      ],
      dest: 'assets/dist/js/all.min.js',
    },
    css: {
      src: [
        'assets/vendor/bootstrap/dist/css/bootstrap.min.css',
        'assets/vendor/bootstrap/dist/css/bootstrap-theme.min.css',
        'assets/vendor/fontawesome/css/font-awesome.min.css',
        // minified with YUI Compressor
        'assets/vendor/raty/lib/jquery.raty.min.css',
        'assets/css/default.min.css'
      ],
      dest: 'assets/dist/css/all.min.css',
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
        dest: 'assets/dist/img/'
      }]
    }
  },
  clean: {
    js: {
      src: ["assets/dist"]
    },
  },
  // copy assets to dist folder
  copy: {
    bootstrap: {
      cwd: 'assets/vendor/bootstrap/dist/fonts',
      src: '**/*',
      dest: 'assets/dist/fonts',
      expand: true
    },
    fontawesome: {
      cwd: 'assets/vendor/fontawesome/fonts',
      src: '**/*',
      dest: 'assets/dist/fonts',
      expand: true
    },
    raty: {
      cwd: 'assets/vendor/raty/lib/fonts',
      src: '**/*',
      dest: 'assets/dist/css/fonts',
      expand: true
    },
    jquerymap: {
      src: 'assets/vendor/jquery/dist/jquery.min.map',
      dest: 'assets/dist/js/jquery.min.map',
    }
  }
});

grunt.registerTask('default', ['jshint', 'sass:dev']);
grunt.registerTask('dist', ['clean', 'uglify', 'sass:dist', 'concat', 'imagemin', 'copy']);
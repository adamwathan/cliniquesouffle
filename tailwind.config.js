module.exports = {
  purge: [
      '**/*.php'
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      container : {
        center: true
      },
      fontFamily: {
        'bask' : ['Libre Baskerville', 'serif'],
        'open' : ['Open Sans', 'sans-serif']
      },
      colors: {
        primary : {
          default: '#013C59',
        },
        secondary : {
          default: '#FFB604'
        },
        souffle: '#00aec4'
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}

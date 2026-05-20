/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./template-parts/**/*.php",
    "./inc/**/*.php",
    "./src/**/*.js",
  ],
  theme: {
    container: {
      center: true,
    },

   extend: {
          colors: {
            primary: '#9db247',
            'primary-dark': '#4a5419',
            'primary-light': '#7a8a2d',
            gold: '#c9a227',
          },
           fontFamily: {
        sans:    ['Poppins', 'system-ui', 'sans-serif'],
        display: ['Poppins', 'system-ui', 'sans-serif'],
            }
        },
  },
  plugins: [],
}


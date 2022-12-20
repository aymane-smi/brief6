/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/views/*.php",
    "./public/src/js/*.js"
  ],
  theme: {
    fontFamily:{
      'georgia': 'Georgia',
      'sofia': 'Sofia'
    },
    extend: {},
  },
  plugins: [],
}

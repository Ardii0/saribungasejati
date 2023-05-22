/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./application/views/*.php",
    "./application/views/**/*.php",
    "./application/views/**/**/*.php",
    "./application/views/**/**/**/*.php",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}


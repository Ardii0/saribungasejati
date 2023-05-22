/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./application/views/*.php",
    "./application/views/**/*.php",
    "./application/views/**/**/*.php",
    "./application/views/**/**/**/*.php",
  ],
  theme: {
    extend: {
      container: {
        screens: {
          sm: '100%',
          md: '100%',
          lg: '1024px',
          xl: '1200px'
        }
      },
      screens: {
        mdmax: { 
          max: '767px'
        },
      },
    },
  },
  plugins: [],
}


/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./src/**/*.{html,php}'],
  theme: {
    extend: {
      backgroundColor: {
        body: '#232323'
      }
    }
  },
  mode: 'jit',
  plugins: []
}

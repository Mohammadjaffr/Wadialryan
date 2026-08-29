/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        brand: {
          primary: '#0B1D2D',
          secondary: '#E03131',
          tertiary: '#C8A86A',
          background: '#F7F9FF',
          surface: '#FFFFFF',
          dark: '#121D26',
          muted: '#43474C',
          light: '#F7F9FF',
        },
      },
      fontFamily: {
        sans: ['Cairo', 'sans-serif'],
      },
      boxShadow: {
        'soft': '0 18px 45px rgba(15, 23, 42, 0.08)',
        'card': '0 10px 30px rgba(15, 23, 42, 0.06)',
      }
    },
  },
  plugins: [],
}

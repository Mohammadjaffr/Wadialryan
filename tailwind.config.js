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
          orange: '#D4AF37', // Gold/Amber instead of generic orange
          amber: '#F59E0B',
          dark: '#0B1120', // Deep Slate/Navy for premium dark look
          gray: '#F8F9FA',
          surface: '#1E293B', // Slightly lighter dark for cards
        },
      },
      fontFamily: {
        sans: ['Cairo', 'sans-serif'], // Upgrading to Cairo for a more premium Arabic look
      },
      boxShadow: {
        'glass': '0 8px 32px 0 rgba(0, 0, 0, 0.37)',
      }
    },
  },
  plugins: [],
}

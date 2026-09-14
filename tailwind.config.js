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
          primary: '#13312A', // Primary Corporate Green
          secondary: '#C69A72', // Secondary / Gold
          background: '#F6E9CA', // From user request "الاوان المستخدمه هذا #13312A,#c69A72,#F6E9CA,#155446"
          darkgreen: '#155446',
          surface: '#FFFFFF', // White
          dark: '#111827', // Neutral Gray (Dark)
          muted: '#6B7280', // Neutral Gray
          light: '#F3F4F6', // Off-White
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

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],

  safelist: ["dark"],
  darkMode: "class",

  theme: {
    extend: {},
  },

  plugins: [
    // require('preline/plugin'),
  ],
}


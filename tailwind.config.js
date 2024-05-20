import forms from "@tailwindcss/forms"
import typography from "@tailwindcss/typography"

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./app/Filament/**/*.php",
    "./resources/**/*.blade.php",
    "./vendor/filament/**/*.blade.php",
    "./resources/views/filament/**/*.blade.php",
  ],
  theme: {
    extend: {},
  },
  plugins: [
    forms,
    typography,
  ],
}


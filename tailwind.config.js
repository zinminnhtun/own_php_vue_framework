const defaultTheme = require("tailwindcss/defaultTheme");
module.exports = {
  darkMode: "class",
  content: ["./views/**/*.{view.php,php,js}"],
  theme: {
    screens: {
      "2xs": "384px",
      xs: "512px",
      ...defaultTheme.screens,
    },
    extend: {},
  },
  plugins: [require("@tailwindcss/forms")],
};

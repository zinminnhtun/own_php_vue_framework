const defaultTheme = require("tailwindcss/defaultTheme");
module.exports = {
    darkMode: 'class',
    content: ["./index.html", "./src/**/*.{vue,js,ts,jsx,tsx}",],
    theme: {
        screens:{
            '2xs': '384px',
            '1.6xs': '428px',
            '1.3xs' :'470px',
            'xs': '512px',
            ...defaultTheme.screens,
        },
        extend: {},
    },
    plugins: [require('@tailwindcss/forms')],
}

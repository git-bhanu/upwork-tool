module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
        },
    },
    variants: {
        extend: {
            borderColor: ['hover', 'focus'],
            opacity: ['disabled'],
            backgroundColor: ['disabled'],
            boxShadow: ['hover']
        },
    },
    plugins: [
        require('@tailwindcss/forms')(),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
    ],
}

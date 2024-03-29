const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./app/Http/Livewire/MainLobby.php",
    ],
  theme: {
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            black: colors.black,
            white: colors.white,
            gray: colors.gray,
            green: colors.green,
            red: colors.red,
            pink: colors.pink,
            yellow: colors.yellow,
            sky: colors.sky,
            'primary': {
                200: '#cbdef8',
                800: '#062249',
                900: '#041b3b'
            },
        },
        extend: {
            fontFamily: {
                'nunito': ['Nunito', 'cursive'],
                'poppins': ['Poppins', 'sans-serif']
            }
        },
      },
  plugins: [],
}

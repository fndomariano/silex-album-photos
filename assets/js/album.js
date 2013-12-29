$('.ui.form')
  .form({
    name: {
      identifier  : 'name',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please enter your NAME'
        }
      ]
    },
    login: {
      identifier : 'login',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please enter a LOGIN'
        }
      ]
    },
    password: {
      identifier : 'password',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please enter a password'
        },
        {
          type   : 'length[6]',
          prompt : 'Your password must be at least 6 characters'
        }
      ]
    },
    Login: {
      identifier : 'login',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please enter a LOGIN'
        }
      ]
    },
    Password: {
      identifier : 'password',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please enter a password'
        },
        {
          type   : 'length[6]',
          prompt : 'Your password must be at least 6 characters'
        }
      ]
    },
    cover_page: {
      identifier : 'cover_page',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please enter a COVER PAGE'
        }
      ]
    }
  });
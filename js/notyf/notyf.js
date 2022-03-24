const notyf = new Notyf({
  types: [
    {
      type: 'success',
      duration: 10000,
      dismissible: true,
      ripple: true,
      position: {
        x: 'right',
        y: 'top',
      },
      background: 'green',
      icon: false
    },
    {
      type: 'info',
      duration: 10000,
      dismissible: true,
      ripple: true,
      position: {
        x: 'right',
        y: 'top',
      },
      background: 'blue',
      icon: false
    },
    {
      type: 'warning',
      duration: 10000,
      dismissible: true,
      ripple: true,
      position: {
        x: 'right',
        y: 'top',
      },
      background: 'orange',
      icon: false
    },
    {
      type: 'danger',
      duration: 10000,
      dismissible: true,
      ripple: true,
      position: {
        x: 'right',
        y: 'top',
      },
      background: 'red',
      icon: false
    },
  ]
});
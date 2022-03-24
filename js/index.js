AOS.init();

const notyf = new Notyf({
  types: [
    {
      type: 'wlmmsj',
      duration: 5000,
      dismissible: true,
      ripple: true,
      position: {
        x: 'right',
        y: 'bottom',
      },
      background: 'blue',
      icon: {
        className: 'material-icons',
        tagName: 'i',
        text: 'account_circle',
        color: 'white'
      }
    },
    {
      type: 'success',
      duration: 5000,
      dismissible: true,
      ripple: true,
      position: {
        x: 'right',
        y: 'top',
      },
      background: 'green',
      icon: {
        className: 'material-icons',
        tagName: 'i',
        text: 'check_circle',
        color: 'white'
      }
    },
    {
      type: 'info',
      duration: 5000,
      dismissible: true,
      ripple: true,
      position: {
        x: 'right',
        y: 'top',
      },
      background: 'blue',
      icon: {
        className: 'material-icons',
        tagName: 'i',
        text: 'info',
        color: 'white'
      }
    },
    {
      type: 'warning',
      duration: 5000,
      dismissible: true,
      ripple: true,
      position: {
        x: 'right',
        y: 'top',
      },
      background: 'orange',
      icon: {
        className: 'material-icons',
        tagName: 'i',
        text: 'report_problem',
        color: 'white'
      }
    },
    {
      type: 'danger',
      duration: 5000,
      dismissible: true,
      ripple: true,
      position: {
        x: 'right',
        y: 'top',
      },
      background: 'red',
      icon: {
        className: 'material-icons',
        tagName: 'i',
        text: 'dangerous',
        color: 'white'
      }
    },
  ]
});
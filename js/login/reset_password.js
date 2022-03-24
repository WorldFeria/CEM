const notyf = new Notyf({
	types: [
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

function disableBackspace(){
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button"
    window.onhashchange=function(){window.location.hash="no-back-button";}
}
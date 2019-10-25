axios.get('api/noticias/todas')
	.then((response) => {
		if(response.data.message == 'Não há Notícias no momento'){
			Swal.fire(
				'Desculpa',
				response.data.message,
				'error'
			  )
		}else{

		}
	})
	.catch((error) => {
		console.log(error);
	});
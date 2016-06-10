$('document').ready(function()
{
	setInterval(function()
	{
		$('#ls_messages').load('index.php?page=ls_messages&ajax');
	}, 1000);
	$('#send_message').submit(function(info)
	{
		info.preventDefault();
		var contenu = $('#message').val();
		$.post('index.php?page=affichage', {"content":contenu}, function()
		{
			$('#message').val('').focus();
		});
		return false;
	});
});
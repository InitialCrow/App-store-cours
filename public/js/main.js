$(document).ready(function(){

	console.log('=========jquery ok ===========')
	checkDelete('.delete');
});

function checkDelete(idButton){
	var $button = $(idButton);
	var confirmMsg = '<p>êtes vous sure de vouloir supprimer ce produit</p>';
	var choice = '<button id="deleteYes" type="submit">oui</button><button id="deleteNo" >non</button>';
	var $msg = '<div id="confirmMsg">'+confirmMsg+choice+'</div>';


	$button.on('click', function(evt){

		evt.preventDefault();
		if($msg !=undefined && $msg!= null && $msg!=""){

			$(this).css('display','none')
			$(this).after($msg);
			var $confirmMsg = $('#confirmMsg');
			var $yes = $('#deleteYes');
			var $no = $('#deleteNo');

			$no.on('click',function(evt){$

				evt.preventDefault();
				$confirmMsg.remove();
				$button.css('display','block')
			});
		}
		else{
			alert('script error');
		}
	})
}


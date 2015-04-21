$(document).ready(function() {
	$("#search-parent-topic").autocomplete({
		source: "/admin/topics/search.json",
		select: function( event, ui ) {
			var newTopic = {id:ui.item.value, label:ui.item.label};
			parentTopics.push(newTopic);
			renderParentTopics();
			$("#search-parent-topic").val('');
			return false;
		}
	});

	$("#search-child-topic").autocomplete({
		source: "/admin/topics/search.json",
		select: function( event, ui ) {
			var newTopic = {id:ui.item.value, label:ui.item.label};
			childTopics.push(newTopic);
			renderChildTopics();
			$("#search-child-topic").val('');
			return false;
		}
	});

	renderParentTopics();
	renderChildTopics();
});

$(document).on('click', '.parent-topic-option', function(){
	if( confirm("Remove Parent Topic?") ){
		var parentTopicId = $(this).attr("pt-id");
		removeParentTopic(parentTopicId);
		renderParentTopics();
	} 
})

function extractLast( term ) {
	return split( term ).pop();
}

function split( val ) {
	return val.split( /,\s*/ );
}

function renderParentTopics(){
	$('#parent-topics-list').html('');
	for(var i=0; i<parentTopics.length; i++){
		$('#parent-topics-list').append('<p class="parent-topic-option" pt-id="'+parentTopics[i].id+'">'+parentTopics[i].label+"</p>");
	}

	$('#parent-topics-inputs').html('');
	for(var i=0; i<parentTopics.length; i++){
		$('#parent-topics-inputs').append('<input id="parent-topics-'+i+'-id" type="hidden" value="'+parentTopics[i].id+'" name="parent_topics['+i+'][id]">');
	}
}

function removeParentTopic(parentTopicId){
	var pos = -1;
	for(var i=0; i<parentTopics.length; i++){
		if(parentTopics[i].id == parentTopicId){
			pos = i;
		}
	}

	if(pos != -1){
		parentTopics.splice(pos, 1);
	}
}

function renderChildTopics(){
	$('#child-topics-list').html('');
	for(var i=0; i<childTopics.length; i++){
		$('#child-topics-list').append('<p class="child-topic-option" pt-id="'+childTopics[i].id+'">'+childTopics[i].label+"</p>");
	}

	$('#child-topics-inputs').html('');
	for(var i=0; i<childTopics.length; i++){
		$('#child-topics-inputs').append('<input id="child-topics-'+i+'-id" type="hidden" value="'+childTopics[i].id+'" name="child_topics['+i+'][id]">');
	}
}

function removeChildTopic(childTopicId){
	var pos = -1;
	for(var i=0; i<childTopics.length; i++){
		if(childTopics[i].id == childTopicId){
			pos = i;
		}
	}

	if(pos != -1){
		childTopics.splice(pos, 1);
	}
}
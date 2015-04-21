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

	$("#search-related-topic").autocomplete({
		source: "/admin/topics/search.json",
		select: function( event, ui ) {
			var newTopic = {id:ui.item.value, label:ui.item.label};
			relatedTopics.push(newTopic);
			renderRelatedTopics();
			$("#search-related-topic").val('');
			return false;
		}
	});

	renderParentTopics();
	renderChildTopics();
	renderRelatedTopics();
});

$(document).on('click', '.parent-topic-option', function(){
	if( confirm("Remove Parent Topic?") ){
		var parentTopicId = $(this).attr("pt-id");
		removeParentTopic(parentTopicId);
		renderParentTopics();
	} 
});

$(document).on('click', '.related-topic-option', function(){
	if( confirm("Remove Related Topic?") ){
		var relatedTopicId = $(this).attr("t-id");
		removeRelatedTopic(relatedTopicId);
		renderRelatedTopics();
	} 
});

function extractLast( term ) {
	return split( term ).pop();
}

function split( val ) {
	return val.split( /,\s*/ );
}

function renderParentTopics(){
	if( typeof parentTopics === 'undefined') return false;

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
	if( typeof childTopics === 'undefined') return false;

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

function renderRelatedTopics(){
	if( typeof relatedTopics === 'undefined') return false;

	$('#related-topics-list').html('');
	var elem = '';
	for(var i=0; i<relatedTopics.length; i++){

		elem = '<div class="related-topic-div">'+
			   '<p class="related-topic-option" t-id="'+relatedTopics[i].id+'">'+relatedTopics[i].label+'</p>'+
			   '<input placeholder="Dev Start Date" value="'+relatedTopics[i].start_date+'" class="development-start-date" type="text" id="topics-'+i+'-joindata-start-date" name="topics['+i+'][_joinData][start_date]"> - '+
			   '<input placeholder="Dev End Date" value="'+relatedTopics[i].end_date+'" class="development-end-date" type="text" id="topics-'+i+'-joindata-end-date" name="topics['+i+'][_joinData][end_date]">'+
			   '</div>';


		$('#related-topics-list').append(elem);
	}

	$('#related-topics-inputs').html('');
	for(var i=0; i<relatedTopics.length; i++){
		$('#related-topics-inputs').append('<input id="topics-'+i+'-id" type="hidden" value="'+relatedTopics[i].id+'" name="topics['+i+'][id]">');
	}
}

function removeRelatedTopic(relatedTopicId){
	var pos = -1;
	for(var i=0; i<relatedTopics.length; i++){
		if(relatedTopics[i].id == relatedTopicId){
			pos = i;
		}
	}

	if(pos != -1){
		relatedTopics.splice(pos, 1);
	}
}
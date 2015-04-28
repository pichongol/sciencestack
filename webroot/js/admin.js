$(document).ready(function() {
	$("#search-parent-project").autocomplete({
		source: "/admin/projects/search.json",
		select: function( event, ui ) {
			var newProject = {id:ui.item.value, label:ui.item.label};
			parentProjects.push(newProject);
			renderParentProjects();
			$("#search-parent-project").val('');
			return false;
		}
	});

	$("#search-child-project").autocomplete({
		source: "/admin/projects/search.json",
		select: function( event, ui ) {
			var newProject = {id:ui.item.value, label:ui.item.label};
			childProjects.push(newProject);
			renderChildProjects();
			$("#search-child-project").val('');
			return false;
		}
	});

	$("#search-related-project").autocomplete({
		source: "/admin/projects/search.json",
		select: function( event, ui ) {
			var newProject = {id:ui.item.value, label:ui.item.label};
			relatedProjects.push(newProject);
			renderRelatedProjects();
			$("#search-related-project").val('');
			return false;
		}
	});

	renderParentProjects();
	renderChildProjects();
	renderRelatedProjects();
});

$(document).on('click', '.parent-project-option', function(){
	if( confirm("Remove Parent Project?") ){
		var parentProjectId = $(this).attr("pt-id");
		removeParentProject(parentProjectId);
		renderParentProjects();
	} 
});

$(document).on('click', '.related-project-option', function(){
	if( confirm("Remove Related Project?") ){
		var relatedProjectId = $(this).attr("t-id");
		removeRelatedProject(relatedProjectId);
		renderRelatedProjects();
	} 
});

function extractLast( term ) {
	return split( term ).pop();
}

function split( val ) {
	return val.split( /,\s*/ );
}

function renderParentProjects(){
	if( typeof parentProjects === 'undefined') return false;

	$('#parent-projects-list').html('');
	for(var i=0; i<parentProjects.length; i++){
		$('#parent-projects-list').append('<p class="parent-project-option" pt-id="'+parentProjects[i].id+'">'+parentProjects[i].label+"</p>");
	}

	$('#parent-projects-inputs').html('');
	for(var i=0; i<parentProjects.length; i++){
		$('#parent-projects-inputs').append('<input id="parent-projects-'+i+'-id" type="hidden" value="'+parentProjects[i].id+'" name="parent_projects['+i+'][id]">');
	}
}

function removeParentProject(parentProjectId){
	var pos = -1;
	for(var i=0; i<parentProjects.length; i++){
		if(parentProjects[i].id == parentProjectId){
			pos = i;
		}
	}

	if(pos != -1){
		parentProjects.splice(pos, 1);
	}
}

function renderChildProjects(){
	if( typeof childProjects === 'undefined') return false;

	$('#child-projects-list').html('');
	for(var i=0; i<childProjects.length; i++){
		$('#child-projects-list').append('<p class="child-project-option" pt-id="'+childProjects[i].id+'">'+childProjects[i].label+"</p>");
	}

	$('#child-projects-inputs').html('');
	for(var i=0; i<childProjects.length; i++){
		$('#child-projects-inputs').append('<input id="child-projects-'+i+'-id" type="hidden" value="'+childProjects[i].id+'" name="child_projects['+i+'][id]">');
	}
}

function removeChildProject(childProjectId){
	var pos = -1;
	for(var i=0; i<childProjects.length; i++){
		if(childProjects[i].id == childProjectId){
			pos = i;
		}
	}

	if(pos != -1){
		childProjects.splice(pos, 1);
	}
}

function renderRelatedProjects(){
	if( typeof relatedProjects === 'undefined') return false;

	$('#related-projects-list').html('');
	var elem = '';
	for(var i=0; i<relatedProjects.length; i++){
		var start_date = (relatedProjects[i].start_date) ? relatedProjects[i].start_date : '';
		var end_date = (relatedProjects[i].end_date) ? relatedProjects[i].end_date : '';
		var finished_year = (relatedProjects[i].finished_year) ? relatedProjects[i].finished_year : '';
		var rol_id = (relatedProjects[i].rol_id) ? relatedProjects[i].rol_id : '';

		elem = '<div class="related-project-div">'+
			   '<p class="related-project-option" t-id="'+relatedProjects[i].id+'">'+relatedProjects[i].label+'</p>'+
			   '<label>Dev Start/End Date </label><br />'+
			   '<input placeholder="Dev Start Date" value="'+start_date+'" class="development-start-date" type="text" id="projects-'+i+'-joindata-start-date" name="projects['+i+'][_joinData][start_date]"> - '+
			   '<input placeholder="Dev End Date" value="'+end_date+'" class="development-end-date" type="text" id="projects-'+i+'-joindata-end-date" name="projects['+i+'][_joinData][end_date]"><br />'+
			   '<label>Finished year </label><br />'+
			   '<input placeholder="Finished year" value="'+finished_year+'" class="development-finished-year" type="text" id="projects-'+i+'-joindata-finished-year" name="projects['+i+'][_joinData][finished_year]"><br />';

		elem += '<label>Rol</label><br />'+
				'<select name="projects['+i+'][_joinData][rol_id]">';

		for(var i=0; i<roles.length; i++){
			elem += '<option value="'+i+'" '+((rol_id==i)?'selected="selected"':'')+'>'+roles[i]+'</option>';
		}

		elem += '</select>'+
			    '</div>';


		$('#related-projects-list').append(elem);
	}

	$('#related-projects-inputs').html('');
	for(var i=0; i<relatedProjects.length; i++){
		$('#related-projects-inputs').append('<input id="projects-'+i+'-id" type="hidden" value="'+relatedProjects[i].id+'" name="projects['+i+'][id]">');
	}
}

function removeRelatedProject(relatedProjectId){
	var pos = -1;
	for(var i=0; i<relatedProjects.length; i++){
		if(relatedProjects[i].id == relatedProjectId){
			pos = i;
		}
	}

	if(pos != -1){
		relatedProjects.splice(pos, 1);
	}
}
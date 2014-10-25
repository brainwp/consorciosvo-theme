lista=`wp post list --post_type="eventos" --field=ID`;count=0; for i in $lista; do count2=$(($count%30));wp db query



 wp post meta update $i agenda-event-date "2014/10/"$count2;wp post meta update $i agenda_endereco "Rua dos Bobos, n."$count; count=$(($count+1)); done

lista=`wp post list --post_type="eventos" --field=ID`;count=1; 
for i in $lista; do count2=$(($count%30));
cat=$((count % 2));
cat=$(($cat+2));
echo 'INSERT INTO wp_term_relationships (object_id, term_taxonomy_id, term_order) VALUES ('$i',' $cat', 0)' > query.sql ;
wp db query < query.sql; count=$(($count+1)); done


lista=`wp post list --post_type="eventos" --field=ID`;count=0; for i in $lista; do count2=$(($count%30)); cat=$((count % 2)); cat=$(($cat+3)); echo 'INSERT INTO wp_term_relationships (object_id, term_taxonomy_id, term_order) VALUES ('$i',' $cat', 0)' > query.sql ; wp db query < query.sql; count=$(($count+1)); done




#!parametros post-type
function pegaid-loop(){
	lista=`wp post list --post_type=$1 --field=ID`
	for i in $lista; do
		#!acao
	done;
}
#!parametros numero de posts, tipo do post
function gera (){
	wp post generate --count=$1 --post_type=$2;
}

#!parametros ids de post, id de categoria
function classifica(){
	echo 'INSERT INTO wp_term_relationships (object_id, term_taxonomy_id, term_order) VALUES ('$1',' $2', 0)' > query.sql ;
	wp db query < query.sql;
}

#!parametros ids de post, meta_key, meta_value
function coloca_custom(){
	wp post meta update $1 $2 $3
}
#!argumentos numero de post e categori
function cria-tudo(){
	
}
wp post generate --count=25 --post_type=eventos;

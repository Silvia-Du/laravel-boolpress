const apiUrlPost = 'api/posts';

function shortifyContent(text){
    return text.substring(1, 40)+ '...';
}


export { apiUrlPost , shortifyContent };

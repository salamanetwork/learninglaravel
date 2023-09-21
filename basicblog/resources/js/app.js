import './bootstrap';
import Search from './live-search';
import Chat from './chat';

// show search results
if(document.querySelector(".header-search-icon"))
{
    new Search();
}

// show chat
if(document.querySelector(".header-chat-icon"))
{
    new Chat();
}

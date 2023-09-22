import './bootstrap';
import Search from './live-search';
import Chat from './chat';
import Profile from './spa-profile';

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

// spa profile
if(document.querySelector(".profile-nav"))
{
    new Profile();
}

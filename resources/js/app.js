require("./bootstrap");

require("alpinejs");

import { MeiliSearch } from 'meilisearch'

window.MeiliSearch = MeiliSearch

import searchComponent from './alpine/searchComponent';
import search from './components/search';

window.components = {
    searchComponent,
    search
};

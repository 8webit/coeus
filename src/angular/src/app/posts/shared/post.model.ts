export class PostModel {
    id: number;
    date: string;
    date_gmt: string;
    modified: string;
    modified_gmt: string;
    link: string;
    slug: string;
    status: string;
    type: string;
    title = {
        rendered: ''
    };
    content = {
        rendered: '',
        protected: false
    };
    excerpt = {
        rendered: '',
        protected: false
    };
    _embedded = {
        author: []
    };
    featured_media: number;
    comment_status: string;
    ping_status: string;
    sticky = false;
    template: string;
    meta: Array<any>;
    categories: Number[];
    tags: Number[];
    liveblog_likes: Number[];
    links = {};
}

import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import { Observable } from 'rxjs/Observable';

import { PostModel } from './post.model';
import { Location } from '@angular/common';

@Injectable()
export class PostService {
    private  url = '/wp-json/wp/v2/posts?_embed&status=publish';

    constructor(private http: HttpClient, private location: Location) {
        this.url = this.location.prepareExternalUrl(this.url);
    }

    getPosts(per_page?: number, non_stickies?: boolean, page?: number, get_full_response?: boolean): Observable<any> {
        let url = this.url;
        url += per_page ? '&per_page=' + per_page : url;
        url += non_stickies ? '&sticky=false' : '';
        url += page ? '&page=' + page : url;

        if (get_full_response) {
            return this.http.get(url, {observe: 'response'});
        }else {
            return this.http.get<PostModel[]>(url);
        }
    }

    getStickies(per_page?: number): Observable<PostModel[]> {
        const url = per_page ? this.url + '&per_page=' + per_page : this.url;

        return this.http.get<PostModel[]>(url + '&sticky=true');
    }

    getPostBySlug(slug: string): Observable<PostModel> {
        return this.http.get<PostModel>(this.url + '&slug=' + slug);
    }

    getPostsByCategoryId(category_id: number, per_page?: number, page?: number): Observable<any> {
        let url = this.url + '&categories=' + category_id;

        if (per_page) {
            url += '&per_page=' + per_page;
        }
        if (page) {
            url += '&page=' + page;
        }

        return this.http.get(url, {observe: 'response'});
    }

    getPostsByAuthor(author_id: number): Observable<PostModel[]> {
        return this.http.get<PostModel[]>(this.url + '&author' +  author_id);
    }

    search(term: string, page?: number): any {
        page = page ? page : 1;
        const url = this.url + '&search="' + term + '"' + '&page=' + page;

        return this.http.get(url, {observe: 'response'});
    }
}

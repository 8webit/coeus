import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Location} from '@angular/common';

import {Observable} from 'rxjs/Observable';
import 'rxjs/observable/of';
import 'rxjs/add/operator/share';
import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/map';

import {PostModel} from '../../posts/shared/post.model';

@Injectable()
export class PageService {
    private url = '/wp-json/wp/v2/pages';

    constructor(private http: HttpClient, private location: Location) {
        this.url = this.location.prepareExternalUrl(this.url);
    }

    getPages(): Observable < PostModel[] > {
        return this.http.get<PostModel[]>(this.url);
    }

    getPage(slug: string, embeded = false): Observable < PostModel > {
        let url = this.url + '?slug=' + slug;
        url = embeded ? url + '&_embed' : url;

        return this.http.get<PostModel>( url );
    }

    getPageById(id: number, embeded = false): Observable < PostModel > {
        let url = this.url + '/' + id;
        url = embeded ? url + '?_embed' : url;

        return  this.http.get<PostModel>( url );
    }
}


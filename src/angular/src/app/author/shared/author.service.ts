import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Location} from '@angular/common';

import { Observable } from 'rxjs/Observable';
import 'rxjs/add/observable/throw';
import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/map';
import 'rxjs/add/operator/delay';

import {AuthorModel} from './author.model';

@Injectable()
export class AuthorService {
    private url = '/wp-json/wp/v2/users';

    constructor(private http: HttpClient, private location: Location) {
        this.url = this.location.prepareExternalUrl(this.url);
    }

    getAuthorBySlug(slug: string) {
        return this.http.get<AuthorModel>(this.url + '?slug=' + slug);
    }

    getById(author_id: Number) {
        return this.http.get<AuthorModel>(this.url + '/' + author_id);
    }
}

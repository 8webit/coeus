import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Location} from '@angular/common';
import { Observable } from 'rxjs/Observable';

import { CategoryModel } from './category.model';

@Injectable()
export class CategoryService {
    private url = '/wp-json/wp/v2/categories';

    constructor(private http: HttpClient, private location: Location) {
        this.url = this.location.prepareExternalUrl(this.url);
    }

    getCategories(): Observable<CategoryModel[]> {
        return this.http.get<CategoryModel[]>(this.url);
    }

    getCategoryByRouter(paramSlug: string): Observable<CategoryModel> {
        return this.http.get<CategoryModel>(this.url + '?slug=' + paramSlug);
    }
}

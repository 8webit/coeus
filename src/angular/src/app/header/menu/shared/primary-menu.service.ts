import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import {Location} from '@angular/common';

import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';

import {MenuModel} from '../../../shared/menu.model';

@Injectable()
export class PrimaryMenuService {
    private  url = '/wp-json/coeus/v1/menus/primary';

    constructor(private http: HttpClient, private location: Location) {
        this.url = this.location.prepareExternalUrl(this.url);
    }

    getMenuItems(): Observable<MenuModel[]> {
        return this.http.get<any>(this.url)
                        .map(res => res.data as MenuModel[]);
    }
}

import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Location} from '@angular/common';

import {Observable} from 'rxjs/Observable';


@Injectable()
export class SettingsService {

    private url = '/wp-json/coeus/v1/settings';

    constructor(private http: HttpClient,
                private location: Location) {
                    this.url = this.location.prepareExternalUrl(this.url);
                }

    getSettings(): Observable <any> {
        return this.http.get<any>(this.url);
    }
}

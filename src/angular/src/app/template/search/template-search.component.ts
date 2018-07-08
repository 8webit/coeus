import {Component, ElementRef, OnInit, ViewChild} from '@angular/core';
import {ActivatedRoute, Router, Params} from '@angular/router';

import {Observable} from 'rxjs/Observable';
import 'rxjs/add/operator/mergeMap';

import {isEmpty} from 'lodash';

import {PostModel} from '../../posts/shared/post.model';

import {PostService} from '../../posts/shared/post.service';
import { SettingsService } from '../../shared/settings.service';

@Component({
    selector: 'template-search',
    templateUrl: './template-search.component.html',
    styleUrls: [ './template-search.component.css' ],
    providers: [ PostService ]
})

export class TemplateSearchComponent implements OnInit {
    searchResults: any;
    settings: Object[];
    term = '';
    slug = ['search'];
    params: Params;
    headers: any;

    constructor(private postService: PostService,
                private settingsService: SettingsService,
                private activatedRoute: ActivatedRoute,
                private router: Router) {}

    ngOnInit() {
        this.getSettings();
        this.getSearchResults();
    }
    getSettings() {
        this.settingsService.getSettings()
                            .subscribe(settings => this.settings = settings);
    }

    getSearchResults() {
        this.activatedRoute.params
                        .mergeMap(params => {
                            this.params = params;

                            if (params.term) {
                                this.setTerm(this.params.term);
                            }

                            if (params.term &&  params.page_index) {
                               return this.postService.search(encodeURI(params.term), params.page_index)
                                                        .map(response => {
                                                        this.headers = response.headers;
                                                        return response.body;
                                                        });
                            }else if (params.term) {
                               return this.postService.search(encodeURI(params.term))
                                                        .map(response => {
                                                        this.headers = response.headers;
                                                        return response.body;
                                                        });
                            }else {
                                return Observable.of<PostModel[]>([]);
                            }
                        }).subscribe(result => this.searchResults = result);
    }

    setTerm(term?: string): void {
        this.term = decodeURI(term);
        this.slug[1] = this.term;
    }

    gotoResult(result: any) {
        window.location.href = result.link;
    }

    gotoSearch() {
        this.router.navigate(['/', 'search', encodeURI(this.term)]);
    }
}

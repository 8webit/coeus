import {Component, OnInit, ViewChild} from '@angular/core';
import {Router} from '@angular/router';

import { Observable } from 'rxjs/Observable';
import { Subject } from 'rxjs/Subject';

import 'rxjs/add/observable/of';
import 'rxjs/add/operator/map';
import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/debounceTime';
import 'rxjs/add/operator/distinctUntilChanged';
import 'rxjs/add/operator/switchMap';

import { PostService } from '../posts/shared/post.service';
import { PostModel } from '../posts/shared/post.model';
import { SettingsService } from '../shared/settings.service';

@Component({
    selector: 'app-search-box',
    templateUrl: './search-box.component.html',
    styleUrls: ['./search-box.component.css'],
    providers: [ PostService ]
})

export class SearchBoxComponent implements OnInit {
    @ViewChild('SearchBox') searchBox: any;
    @ViewChild('AutoComplete') autocomplete: any;

    searchResult: Observable<PostModel[]>;
    searchTerm = new Subject<string>();
    settings: Object[];
    hide_field = false;

    constructor(private router: Router,
                private postService: PostService,
                private settingsService: SettingsService) {}

    ngOnInit() {
        this.ifMobile();
        this.setSearchResult();
    }

    ifMobile() {
        if (window.screen.width  < 1024 && !this.hide_field) {
            this.hide_field = true;
        }
    }
    setSearchResult() {
        this.searchResult = this.searchTerm
            .debounceTime(300)
            .distinctUntilChanged()
            .switchMap(term => term && term.length > 2
                ? this.postService.search(term)
                                    .map(res => res.body)
                : Observable.of<PostModel[]>([]));
    }

    keyupListener(event: any) {
        switch (event.key) {
            case 'Enter':
                this.removeAutoComplete();
                this.gotoSearchPage(this.searchBox.nativeElement.value);
                break;
            case 'Escape':
                this.removeAutoComplete();
                break;
            default :
                this.search(this.searchBox.nativeElement.value);
                break;
        }
    }

    search(term: string): void {
        this.searchTerm.next(term);
    }

    gotoResult(result: PostModel): void {
        window.location.href = result.link;
    }

    removeAutoComplete() {
        if (this.autocomplete) {
            this.autocomplete.nativeElement.remove();
        }
    }

    gotoSearchPage(value?: string): void {
        value = value ? value : this.searchBox.nativeElement.value;

        if (value) {
            this.router.navigate(['/search', encodeURI(value)]);
        }else {
            this.router.navigate(['/search']);
        }
    }

    toggleField() {
        if (window.screen.width <= 1024) {
            this.hide_field = !this.hide_field;
        }
    }
}


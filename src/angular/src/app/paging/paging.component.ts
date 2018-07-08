import {Component, Input, OnInit} from '@angular/core';
import {ActivatedRoute, Params, Router} from '@angular/router';

import { isArray } from 'lodash';

@Component({
  selector: 'app-paging',
  templateUrl: './paging.component.html',
  styleUrls: ['./paging.component.css']
})
export class PagingComponent implements OnInit {
    @Input() settings: any;
    @Input() page_count: number;
    @Input() slug: any;

    current_page = 1;
    pagination: number[];

    constructor(private activatedRoute: ActivatedRoute,
              private router: Router) { }

    ngOnInit() {
        if (this.current_page > 0) {
            this.activatedRoute.params.subscribe(params => {
                this.current_page = +params.page_index ? +params.page_index : 1;
                this.generatePagination();
            });
        }
        if (this.page_count > 0 && (this.current_page <= 0 || this.current_page > this.page_count ) )  {
            this.router.navigateByUrl('/error/404');
        }
    }

    generatePagination() {
       this.pagination = [];
       this.current_page = +this.current_page;

       let start = 0;
       let finish = 0;

       const SUB = this.page_count - this.current_page;

       if (SUB <= 4) {
            start = this.page_count >= 10 ? this.page_count - 10 : 1;
            finish = this.page_count >= 10 ? this.current_page + SUB : this.page_count;
       }else {
           start = this.current_page - 4 <= 0 ? 1 : this.current_page - 4;

           if (SUB > 10) {
                finish = start === 1 ? 10 : this.current_page + 5;
           }else {
                finish = start === 1 ? this.page_count : (this.page_count - this.current_page) + 5;
           }
       }

       for (let i = 0;  start + i <= finish; i++) {
            this.pagination[i] = start + i;
       }
    }

    gotoPrevious() {
        const slug = this.generateSegment(this.slug);
        this.router.navigateByUrl('/' + slug +  'page/' + (this.current_page - 1));
    }

    gotoNext() {
        const slug = this.generateSegment(this.slug);
        this.router.navigateByUrl('/' + slug +  'page/' + (this.current_page + 1));
    }

    gotoPage(page: number) {
        const slug = this.generateSegment(this.slug);
        this.router.navigateByUrl('/' + slug +  'page/' + page);
    }

    generateSegment(arg: any) {
        if (!arg) {
            return '';
        }else if (isArray(arg)) {
            let segment = '/';

            for (const entry of arg){
                segment += encodeURI(entry) + '/';
            }
            return segment;
        }else {
            return arg + '/';
        }
    }
}

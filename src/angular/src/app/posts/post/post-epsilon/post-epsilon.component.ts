import {Component, Input, OnInit} from '@angular/core';
import {PostModel} from '../../shared/post.model';
import {AuthorModel} from '../../../author/shared/author.model';
import {AuthorService} from '../../../author/shared/author.service';

@Component({
    selector: 'app-post-epsilon',
    templateUrl: './post-epsilon.component.html',
    styleUrls: ['./post-epsilon.component.css'],
    providers: [AuthorService]
})
export class PostEpsilonComponent implements OnInit {
    @Input() post: PostModel;
    @Input() settings: any;
    column = {};
    author: AuthorModel;

    constructor(private authorService: AuthorService) { }

    ngOnInit() {
        this.setColumn();

        if (this.post) {
            this.authorService.getById(this.post._embedded.author[0].id)
                .subscribe(author => this.author = author);
        }
    }
    setColumn() {
        const hasBothSidebar = this.settings.post.sidebars.left.length !== 0
                                && this.settings.post.sidebars.right.length !== 0;

        this.column = {
            'pure-u-12-24': hasBothSidebar && this.settings.post.container === 'fixed',
            'pure-u-16-24': hasBothSidebar && this.settings.post.container === 'fluid',
            'pure-u-18-24': !hasBothSidebar && this.settings.post.container === 'fixed',
            'pure-u-20-24': !hasBothSidebar && this.settings.post.container === 'fluid'
        };
      }

}

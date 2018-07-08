import {Component, Input, OnInit} from '@angular/core';
import {PostModel} from '../../shared/post.model';

@Component({
  selector: 'app-post-beta',
  templateUrl: './post-beta.component.html',
  styleUrls: ['./post-beta.component.css']
})
export class PostBetaComponent implements OnInit {
  @Input() post: PostModel;
  @Input() settings: any;
  column = {};

  constructor() { }

  ngOnInit() {
    this.setColumn();
  }

  setColumn() {
    const hasBothSidebar = this.settings.post.sidebars.left.length !== 0
                            && this.settings.post.sidebars.right.length !== 0;

    this.column = {
        'pure-u-14-24': hasBothSidebar,
        'pure-u-19-24': !hasBothSidebar
    };
  }

}

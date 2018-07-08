import {Component, Input, OnInit} from '@angular/core';
import {PostModel} from '../../shared/post.model';

@Component({
  selector: 'app-post-gamma',
  templateUrl: './post-gamma.component.html',
  styleUrls: ['./post-gamma.component.css']
})
export class PostGammaComponent implements OnInit {
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
        'pure-u-12-24': hasBothSidebar && this.settings.post.container === 'fixed',
        'pure-u-16-24': hasBothSidebar && this.settings.post.container === 'fluid',
        'pure-u-18-24': !hasBothSidebar && this.settings.post.container === 'fixed',
        'pure-u-20-24': !hasBothSidebar && this.settings.post.container === 'fluid'
    };
  }

}

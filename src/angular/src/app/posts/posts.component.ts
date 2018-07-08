import { Component, OnInit, Input } from '@angular/core';
import { SettingsService } from '../shared/settings.service';

@Component({
    selector: 'posts',
    templateUrl: './posts.component.html',
    styleUrls: ['./posts.component.css']
})

export class PostsComponent implements OnInit {
    settings: any;
    postListColumn: {};
    @Input() isHomePage: boolean;

    constructor(private settingsService: SettingsService) {}

    ngOnInit() {
        this.getSettings();
    }

    getSettings() {
        this.settingsService.getSettings()
                            .subscribe(settings => {
                                this.settings = settings.post_list;
                                this.setPostListColumn();
                            });
    }

    setPostListColumn() {
        const hasBothSidebar = this.settings.sidebars.left.length !== 0
                                && this.settings.sidebars.right.length !== 0;
        const hasSidebar = this.settings.sidebars.left.length !== 0
                            || this.settings.sidebars.right.length !== 0;
        this.postListColumn = {
            'pure-u-12-24': hasBothSidebar && this.settings.container === 'fixed',
            'pure-u-16-24': hasSidebar && !hasBothSidebar && this.settings.container === 'fluid' ||
                            !hasSidebar && hasBothSidebar && this.settings.container === 'fluid',
            'pure-u-1': !hasBothSidebar && this.settings.container === 'fixed'
                          || !hasBothSidebar && this.settings.container === 'fluid'
        };
    }
}



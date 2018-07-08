import {Component, OnInit} from '@angular/core';
import {ActivatedRoute} from '@angular/router';
import {Title} from "@angular/platform-browser";

@Component({
   templateUrl: './error.component.html',
   styleUrls: [ './error.component.css' ]
})

export class ErrorComponent implements OnInit {
    status: number;
    messages: Object[];

    constructor(private activatedRoute: ActivatedRoute,
                private titleService: Title) {}

    ngOnInit() {
        this.initMessages();
        this.activatedRoute.params.subscribe(param => {
            this.status = +param.status;

            this.titleService.setTitle('Error');
        });
    }

    initMessages() {
        this.messages = [];

        this.messages[0] = {
            title: 'Woops!',
            message: 'Something went totally wrong...'
        };

        this.messages[404] = {
            title : 'Error - 404',
            message: 'The requested URL was not found'
        };

        this.messages[403] = {
            title: 'Error - 403',
            message: 'Access Forbidden!'
        };
    }
}

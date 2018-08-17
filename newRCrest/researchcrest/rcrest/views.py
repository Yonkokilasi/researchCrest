# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.shortcuts import render

# Create your views here
def start(request):
    return render(request, 'rcrest/index.html')
# Create your views here
def about(request):
    return render(request, 'rcrest/about.html')
# Create your views here
def post_order(request):
    return render(request, 'rcrest/post-order.html')
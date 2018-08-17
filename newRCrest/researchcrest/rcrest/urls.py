from django.conf.urls import url
from . import views

urlpatterns = [
	url(r'^$',views.start,name='index'),
	url(r'^$',views.about,name='about'),
	url(r'^$',views.start,name='post-order'),
]
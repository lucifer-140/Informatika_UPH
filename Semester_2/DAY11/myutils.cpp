
void clear_buffer_input_cache() {
	char c;
	while ((c = getchar()) != '\n' && c != EOF);
}

bool is_numeric(const char *s) {
	for (int i = 0; i < strlen(s); i++) {
		if (!isdigit(s[i])) return false;
	}
	return true;
}


int get_int(const char *prompt) {
	int x;
	char input[10];
	while (true) {
		printf("%s ? ", prompt); scanf("%[^\n]", input); clear_buffer_input_cache();
		if (strcmp(input, "") == 0) {
			printf("input tidak valid ...\n");
		}
		else if (!is_numeric(input)) {
			printf("input tidak valid ...\n");
		}
		else {
			x = atoi(input);
			break;	
		}
	} 
	return x;
}

